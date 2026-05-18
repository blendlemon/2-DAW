<?php

namespace App\Command;

use App\Entity\Country;
use App\Service\CountriesApiClientService;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:ImportCountriesCommand',
    description: 'Add a short description for your command',
)]
class ImportCountriesCommand extends Command
{
    public function __construct(
        private CountriesApiClientService $countriesApi,
        private EntityManagerInterface $em,
        private LoggerInterface $logger
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        // $this
        //     ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
        //     ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        // ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $countries = $this->countriesApi->getAllCountries();

            $this->logger->info('Inicio importación de países', [
                'total_api' => count($countries),
            ]);

            // Limpiar tabla y resetear ids durante pruebas
            $this->em->getConnection()->executeStatement('DELETE FROM country');
            $this->em->getConnection()->executeStatement('ALTER TABLE country AUTO_INCREMENT = 1');

            $imported = 0;

            foreach ($countries as $country) {
                $newCountry = new Country();
                $newCountry->setName($country['name']['official']);
                $newCountry->setCode($country['cca2']);

                if (isset($country['capital'][0])) {
                    $newCountry->setCapital($country['capital'][0]);
                } else {
                    $this->logger->warning('País sin capital en API', [
                        'code' => $country['cca2'] ?? null,
                    ]);
                }

                $newCountry->setPopulation($country['population']);
                $newCountry->setCountryLat($country['latlng'][0]);
                $newCountry->setCountryLng($country['latlng'][1]);

                $this->em->persist($newCountry);
                $imported++;
            }

            $this->em->flush();

            $this->logger->info('Importación completada', [
                'imported' => $imported,
            ]);

            $io->success('Importación terminada: ' . $imported . ' países.');
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $this->logger->error('Error importando países', [
                'exception' => $e,
                'message' => $e->getMessage(),
            ]);

            $io->error('Error en la importación: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }
}
