const {validateHex} = require('../../util');

describe('util.validateHex', () => {
    test('makes no change if hex code is 6-digit and valid', () => {
        expect(validateHex('0123F4')).toBe('0123F4');
    });

    test('removes trailing hashtag "#"', () => {
        expect(validateHex('#012345')).toBe('012345');
    });

    test('converts three digit hex to 6 digits', () => {
        expect(validateHex('#677')).toBe('667777');
        expect(validateHex('677')).toBe('667777');
    });

    test('throws error if hex is invalid', () => {
        const errorMessage = 'Invalid color code';

        expect(() => validateHex('99')).toThrow(errorMessage);
        expect(() => validateHex('#99')).toThrow(errorMessage);
        expect(() => validateHex('#999 999')).toThrow(errorMessage);
    });
});
