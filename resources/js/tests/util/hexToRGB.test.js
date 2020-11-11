const {hexToRGB} = require('../../util');

describe('util.hexToRGB', () => {
    test('validateCb is called once', () => {
        const validateCb = jest.fn(hex => hex);

        hexToRGB('#123456', validateCb);

        expect(validateCb.mock.calls.length).toBe(1);
    });

    test('converts valid hex correctly', () => {
        expect(hexToRGB('#FFFF00')).toEqual({r: 255, g: 255, b: 0});
    });
});
