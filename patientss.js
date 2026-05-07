
document.addEventListener('DOMContentLoaded', () => {
    const fetchData = async () => {

            let htmlGenerated = "";
            const header = `
            <tr class="t-header">
                                <td>Name</td>
                                <td>DOB</td>
                                <td>Gender</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>`

            try {
                const res = await fetch('patientsWindowLoaded.php');
                const data = await res.json()
                
                data.map(patientData => 

                    htmlGenerated += `
                                <tr>
                                    <td> ${patientData.name} </td>
                                    <td> ${patientData.dob} </td>
                                    <td> ${patientData.gender} </td>
                                    <td> ${patientData.phone} </td>
                                    <td> ${patientData.address} </td>
                                    <td> ${patientData.status}</td>
                                    <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                        </tr>
                    
                    `
                )
                 
                const fixed = `<table> ${header} ${htmlGenerated} </table>`;

                document.getElementById("js-table").innerHTML = fixed;




            } catch (error) {
                console.log(error)
            }

        }

        fetchData();
})


document.getElementById('js-showBtn').addEventListener('click', ()=> {
    if(document.getElementById('js-showBtn').innerText === 'Show all'){
        document.getElementById('js-showBtn').innerText = 'Show less'


        const fetchData = async () => {

            let htmlGenerated = "";
            const header = `
            <tr class="t-header">
                                <td>Name</td>
                                <td>DOB</td>
                                <td>Gender</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>`

            try {
                const res = await fetch('allpatients.php');
                const data = await res.json()
                
                data.map(patientData => 

                    htmlGenerated += `
                                <tr>
                                    <td> ${patientData.name} </td>
                                    <td> ${patientData.dob} </td>
                                    <td> ${patientData.gender} </td>
                                    <td> ${patientData.phone} </td>
                                    <td> ${patientData.address} </td>
                                    <td> ${patientData.status} </td>
                                    <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                        </tr>
                    
                    `
                )
                 
                const fixed = `<table> ${header} ${htmlGenerated} </table>`;

                document.getElementById("js-table").innerHTML = fixed;


            } catch (error) {
                console.log(error)
            }

        }

        fetchData();
    


    } else{
        document.getElementById('js-showBtn').innerText = 'Show all'


         const fetchData = async () => {

            let htmlGenerated = "";
            const header = `
            <tr class="t-header">
                                <td>Name</td>
                                <td>DOB</td>
                                <td>Gender</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>`

            try {
                const res = await fetch('allpatientsLess.php');
                const data = await res.json()
                
                data.map(patientData => 

                    htmlGenerated += `
                                <tr>
                                    <td> ${patientData.name} </td>
                                    <td> ${patientData.dob} </td>
                                    <td> ${patientData.gender} </td>
                                    <td> ${patientData.phone} </td>
                                    <td> ${patientData.address} </td>
                                    <td> ${patientData.status} </td>
                                    <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                        </tr>
                    
                    `
                )
                 
                const fixed = `<table> ${header} ${htmlGenerated} </table>`;

                document.getElementById("js-table").innerHTML = fixed;


            } catch (error) {
                console.log(error)
            }

        }

        fetchData();



    }
})



//filter stuff

document.getElementById('js-filter').addEventListener('change', (e)=>{
    try {
        const fetchData = async () => {
            const res = await fetch('filter.php',{
                method:'POST',
                headers : {
                    'Content-Type' : 'application/json'
                },
                body: JSON.stringify(e.target.value)
            })

            const data = await res.json();

             let htmlGenerated = "";
             const header = `
            <tr class="t-header">
                                <td>Name</td>
                                <td>DOB</td>
                                <td>Gender</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Status</td>
                                <td>Actions</td>
                            </tr>`

                
                data.map(patientData => 

                    htmlGenerated += `
                                <tr>
                                    <td> ${patientData.name} </td>
                                    <td> ${patientData.dob} </td>
                                    <td> ${patientData.gender} </td>
                                    <td> ${patientData.phone} </td>
                                    <td> ${patientData.address} </td>
                                    <td> ${patientData.status} </td>
                                    <td class="edit-delete-icons">
                                    <img src="images/edit.svg" alt="edit image">
                                    <img src="images/bin.svg" alt="bin image">
                                </td>
                        </tr>
                    
                    `
                )
                 
                const fixed = `<table> ${header} ${htmlGenerated} </table>`;

                document.getElementById("js-table").innerHTML = fixed;
        }

        fetchData();
        
    } catch (error) {
        console.log(error)
    }
})