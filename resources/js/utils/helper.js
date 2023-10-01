export function validatePrice(price) {
    const priceRegex = /^[0-9]+(\.[0-9]{1,2})?$/;

    if(!priceRegex.test(price)) {
        return false;
    }
    return true;
}