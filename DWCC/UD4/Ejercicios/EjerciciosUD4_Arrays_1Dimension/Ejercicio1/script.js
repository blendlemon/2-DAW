function compruebaOrden(numeros){
    let flag = false;
    for (let i = 0 ; i<numeros.length-1; i++){
      if(numeros[i]<numeros[i+1]){
        flag = true;
      }else{
        flag = false;
        break;
      }
    }
    return flag;
}