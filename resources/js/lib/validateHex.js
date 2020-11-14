export default function validateHex(hex) {
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
