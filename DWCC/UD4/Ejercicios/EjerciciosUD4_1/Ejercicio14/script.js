function CompruebaParentesis(frase) {
    let parentesis = [];
    let correcto = false;
    for (i = 0; i < frase.length; i++){
        if (frase.charAt(i) == '(') {
            parentesis.push(frase.charAt(i));
        }
        else if (frase.charAt(i) == ')') {
            parentesis.pop();
        }
    }
    if (parentesis.length == 0) {
        correcto = true;
    }

    return correcto;
}