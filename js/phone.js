let form = document.getElementById('form_add_phone')

form.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('php/add_new_phone.php', {
        method: 'POST',
        body: new FormData(form)
      });
      form.reset();
      
      let result = await response.json();
      alert(result.message);
      show_list_phones();
}

async function show_list_phones() {
    let response = await fetch('php/load_list_phones.php');
    let phones = await response.json();
    let table_body = document.getElementById('t_body_list_phones');
    
    table_body.innerHTML = "";
    for(let phone in phones) {
        table_body.insertAdjacentHTML('beforeend', `
            <tr> 
                <td>${phones[phone][0]}</td>
                <td>${phones[phone][1]}</td>
                <td>${phones[phone][2]}</td> 
            </tr>
        `)
    }
}
show_list_phones()