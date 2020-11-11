const {hexToRGB, validateHex} = require('./util');
require('./bootstrap');

window.invertColor = function invertColor (hex, bw) {
    hex = validateHex(hex);
    const rgb = hexToRGB(hex);

    if (bw) {
        const {r, g, b} = rgb;
        return (r * 0.299 + g * 0.587 + b * 0.114) > 186 ? '#000000' : '#FFFFFF';
    }

    const invertCodes = (inverted, code) => inverted + (255 - code).toString(16).padStart(2, '0');

    return Object.values(rgb).reduce(invertCodes, '#');
};

window.leaveServer = async function leaveServer (action, dest) {
    if (confirm('Do you want to leave the server?')) {
        await axios.delete(action);
        location.href = dest;
    }
};
