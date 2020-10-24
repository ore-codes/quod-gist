require('./bootstrap');

window.leaveServer = async function (action, dest) {
    if (confirm('Do you want to leave the server?')) {
        await axios.delete(action);
        location.href = dest;
    }
};
