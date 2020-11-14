import {floor} from 'lodash';

export default function dateDiffInDays(date1, date2) {
    if (! (date1 instanceof Date && date2 instanceof Date)) {
        throw new Error('date1 and date2 must be instances of Date');
    }

    const utc = date => Date.UTC(date.getFullYear(), date.getMonth(), date.getDate());

    return floor((utc(date2) - utc(date1)) / (1000 * 60 * 60 * 24));
}
