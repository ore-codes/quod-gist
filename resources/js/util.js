import {floor} from 'lodash';

export function dateDiffInDays(date1, date2) {
    const utc = date => Date.UTC(date.getFullYear(), date.getMonth(), date.getDate());
    return floor((utc(date2) - utc(date1)) / (1000 * 60 * 60 * 24));
}
