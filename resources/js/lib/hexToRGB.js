import validateHex from './validateHex.js';

export default function hexToRGB(hex, validateCb = validateHex) {
    hex = validateCb(hex);
    const hexToDecimal = (acc, name, index) => ({
        ...acc,
        [name]: parseInt(hex.substr(index *= 2, 2), 16)
    });

    return ['r', 'g', 'b'].reduce(hexToDecimal, {});
}
