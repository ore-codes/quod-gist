const {dateDiffInDays} = require('../../util');

describe('util.dateDiffInDays', () => {
    test('returns correct date differences to the nearest floor estimation', () => {
        expect(dateDiffInDays(new Date(2020, 10, 1), new Date(2020, 10, 7))).toBe(6);
        expect(dateDiffInDays(new Date(2020, 10, 7), new Date(2020, 10, 7))).toBe(0);
        expect(dateDiffInDays(new Date(2020, 10, 7, 12, 0, 0), new Date(2020, 10, 7, 15, 0, 0))).toBe(0);
    });

    test('throws error if a non-Date object is passed as argument', () => {
        expect(() => dateDiffInDays(new Date(), 8)).toThrow('date1 and date2 must be instances of Date');
    });
});
