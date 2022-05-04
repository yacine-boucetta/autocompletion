document.addEventListener("DOMContentLoaded", () => {
    let search = document.querySelector("[name='siteSearch']")
    let div = document.querySelectorAll('div')
    let tab = []
    let data = new FormData();
    div[0].innerHTML = ''
    document.getElementById('siteSearch').addEventListener("keyup", async () => {
        if (search.value.length === 0) {
            div[0].innerHTML = ''
            tab = []
        }else{
            div[0].innerHTML = ''
            tab=[]

            data.append('siteSearch', encodeURIComponent(siteSearch.value))

            let promises = [
                fetch('pokemon.php?complete=1', { method: 'POST', body: data }).then((response) => response.json()),
                fetch('pokemon.php?complete=2', { method: 'POST', body: data }).then((response2) => response2.json()),]

            await Promise.allSettled(promises).then((results) => results.forEach((result) => tab.push(result)))
                .then(function () { tab[0].value.forEach((element) =>
                    div[0].innerHTML += `<a href=element.php?id=${element.id}>${element.name_french}</a>`+'<br>'
                    );
                    div[0].innerHTML += '<hr>'

                    tab[1].value.forEach((element) => 
                    div[0].innerHTML += `<a href=element.php?id=${element.id}>${element.name_french}</a>` + '<br>'
                    );
                })
        }
    })
})
