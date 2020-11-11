const {floor} = require('lodash');

function validateHex(hex) {
    if (hex.indexOf('#') === 0)
        hex = hex.substr(1);

    if (hex.length === 3) {
        const repeatHex = (acc, hex) => acc + hex.repeat(2);
        hex = Array.from(hex).reduce(repeatHex, '');
    }

    if (hex.length !== 6)
        throw new Error('Invalid color code');

    return hex;
}

function hexToRGB(hex, validateCb = validateHex) {
    hex = validateCb(hex);
    const hexToDecimal = (acc, name, index) => ({
        ...acc,
        [name]: parseInt(hex.substr(index *= 2, 2), 16)
    });

    return ['r', 'g', 'b'].reduce(hexToDecimal, {});
}

function dateDiffInDays(date1, date2) {
    if (! (date1 instanceof Date && date2 instanceof Date)) {
        throw new Error('date1 and date2 must be instances of Date');
    }

    const utc = date => Date.UTC(date.getFullYear(), date.getMonth(), date.getDate());

    return floor((utc(date2) - utc(date1)) / (1000 * 60 * 60 * 24));
}

module.exports = {validateHex, hexToRGB, dateDiffInDays};
