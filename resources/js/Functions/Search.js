export default async function search(routeName, sortBy) {
    let response = {};
    await axios;
    await axios
        .get(routeName, {
            params: {
                sort: sortBy,
            },
        })
        .then((res) => {
            response.data = res.data;
            response.pagination = res.data.meta;
        })
        .catch((err) => {
            response = err;
        });
    return response;
}
