<?php

/**
 * Calcula o subtotal a partir do array de produtos.
 * Cada produto debe ter as claves 'prezo' e 'cantidade'.
 * Devolve float.
 *
 * @param array $productos
 * @return float
 */
function calcSubtotal(array $productos): float
{
	$subtotal = 0.0;
	foreach ($productos as $p) {
		$precio = isset($p['prezo']) ? (float) $p['prezo'] : 0.0;
		$cant = isset($p['cantidade']) ? (int) $p['cantidade'] : 0;
		$subtotal += $precio * $cant;
	}

	return (float) round($subtotal, 2);
}

/**
 * Calcula o desconto: se o subtotal supera 100€ o desconto é 5% do subtotal, en caso contrario 0.
 * Devolve float.
 *
 * @param float $subtotal
 * @return float
 */
function calcDiscount(float $subtotal): float
{
	if ($subtotal > 100.0) {
		return (float) round($subtotal * 0.05, 2);
	}
	return 0.0;
}

/**
 * Calcula a base (subtotal - desconto), o IVE (21% sobre a base) e o total.
 * Devolve un array con claves 'base', 'iva' e 'total'.
 *
 * @param float $subtotal
 * @param float $discount
 * @return array
 */
function calcTotal(float $subtotal, float $discount): array
{
	$base = round($subtotal - $discount, 2);
	if ($base < 0) {
		$base = 0.0;
	}
	$iva = (float) round($base * 0.21, 2);
	$total = (float) round($base + $iva, 2);

	return [
		'base' => $base,
		'iva' => $iva,
		'total' => $total
	];
}

/**
 * Xera e devolve un HTML con o resumo do pedido para mostrar na páxina.
 *
 * @param array $productos
 * @return string
 */
function showSummary(array $productos): string
{
	$subtotal = calcSubtotal($productos);
	$discount = calcDiscount($subtotal);
	$calc = calcTotal($subtotal, $discount);

	$html = '';
	$html .= "<div class=\"mt-4 alert alert-info\">";
	$html .= "<h5>Resumo do pedido</h5>";
	$html .= "<ul class=\"mb-0 list-unstyled\">";
	$html .= "<li>Subtotal: &euro;" . number_format($subtotal, 2) . "</li>";
	$html .= "<li>Desconto: &euro;" . number_format($discount, 2) . "</li>";
	$html .= "<li>Base impoñible (subtotal - desconto): &euro;" . number_format($calc['base'], 2) . "</li>";
	$html .= "<li>IVE (21%): &euro;" . number_format($calc['iva'], 2) . "</li>";
	$html .= "<li class=\"fw-bold\">Total: &euro;" . number_format($calc['total'], 2) . "</li>";
	$html .= "</ul>";
	$html .= "</div>";

	return $html;
}