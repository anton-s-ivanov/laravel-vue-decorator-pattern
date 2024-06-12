export const fetchData = async(url) => {
    try {
        let response = await fetch(url);
        if(response.ok) {
            let data = await response.json();
            return data.data;
        } 

        console.error("Ошибка HTTP: " + response.status);
    }
    catch(e) {
        console.error(e);
    }
}

export const storeData = async(url, formData) => {
    try {
        let response = await fetch(url, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(formData)
        });

        if(response.ok) {
            let data = await response.json();
            return data.data;
        } 

        console.error("Ошибка HTTP: " + response.status);
    }
    catch(e) {
        console.error(e);
    }
}
