<template>
    <h5 class="flex justify-between text-sm">
        <span class="font-bold text-gray-800">{{ author }}</span>
        <span class="inline-flex items-center text-gray-400">
            <svg class="inline w-3 h-3 mr-1"><use xlink:href="#icon-clock"></use></svg>
            <span>{{ date|daysAgo }}</span>
        </span>
    </h5>
</template>

<script>
    import {cond, round} from "lodash";
    import dateDiffInDays from "./../../lib/dateDiffInDays.js";

    export default {
        props: {
            author: String,
            date: Date,
        },
        filters: {
            daysAgo(date) {
                const diff = dateDiffInDays(date, new Date());
                const condEntries = [
                    [diff < 1,  `today ${date.getHours()}:${date.getMinutes()}`],
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
