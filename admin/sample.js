const formData = {
    value1: 'magic',
    // Add more values if needed
};

fetch('http://localhost/rosed/admin/attend.php', {
    method: 'POST',
    body: JSON.stringify(formData),
    headers: {
        'Content-Type': 'application/json'
    }
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json();
})
.then(data => {
    console.log('Data inserted successfully:', data);
})
.catch(error => {
    console.error('There was a problem with the fetch operation:', error);
});
