export function validatePrice(price) {
    const priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/;

    if(!priceRegex.test(price)) {
        return false;
    }
    return true;
}

export function priceMagnitude(priceString) {
    if(!priceString.includes('.')){
        return (parseInt(priceString))*100;
    }
    const [integerPart, decimalPart] = priceString.split('.');
    if(decimalPart.length === 1) {
        priceString += "0";
    }
    return parseInt(priceString.replace(".", ""));
}