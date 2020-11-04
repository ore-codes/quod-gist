import {floor} from 'lodash';

export function validateHex(hex) {
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

export function hexToRGB(hex) {
    hex = validateHex(hex);
    const hexToDecimal = (acc, name, index) => ({
        ...acc,
        [name]: parseInt(hex.substr(index *= 2, 2), 16)
    });

    return ['r', 'g', 'b'].reduce(hexToDecimal, {});
}

export function dateDiffInDays(date1, date2) {
    const utc = date => Date.UTC(date.getFullYear(), date.getMonth(), date.getDate());
    return floor((utc(date2) - utc(date1)) / (1000 * 60 * 60 * 24));
}
