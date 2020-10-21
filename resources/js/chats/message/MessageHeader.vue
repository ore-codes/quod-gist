<template>
    <h5 class="flex justify-between text-sm">
        <span class="font-bold text-gray-800">{{ author }}</span>
        <span class="text-gray-400">{{ date|daysAgo }}</span>
    </h5>
</template>

<script>
    import {cond, floor, round} from "lodash";

    function dateDiffInDays(date1, date2) {
        const utc = date => Date.UTC(date.getFullYear(), date.getMonth(), date.getDate());
        return floor((utc(date2) - utc(date1)) / (1000 * 60 * 60 * 24));
    }

    export default {
        props: {
            author: String,
            date: Date,
        },
        filters: {
            daysAgo(date) {
                const diff = dateDiffInDays(date, new Date());
                const condEntries = [
                    [diff < 1, 'today'],
                    [diff === 1, 'a day ago'],
                    [diff <= 31, `${diff} days ago`],
                    [diff <= 365, `${round(diff / 31)} months ago`],
                    [true, `${round(diff / 365.25)} years ago`]
                ].map(([bool, val]) => [() => bool, () => val]);
                return cond(condEntries)();
            },
        }
    }
</script>
