function showForm(formId) {
    document.querySelectorAll(".form-box").forEach(form => form.classList.remove("active"))
    document.getElementById(formId).classList.add("active")
}


function confirmDelete() {
    const answer = prompt("Are you sure you want to delete this member? Type 'yes' to confirm:");
    return answer && answer.toLowerCase() === 'yes';
}
