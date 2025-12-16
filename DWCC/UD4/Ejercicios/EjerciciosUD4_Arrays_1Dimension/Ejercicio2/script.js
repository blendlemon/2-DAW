function repetido(a, b) {
  let aux = [];
  for (let elemento1 of a) {
    for (let elemento2 of b) {
      if(elemento1 == elemento2){
          aux.push(elemento1);
      }
    }
  }
  return Array.from(new Set(aux));
}
