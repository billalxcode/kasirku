let initChoice = new Choices('.choices')

let form = document.getElementById('form')

// protected input enter
form.addEventListener('keydown', function(event) {
    if (event.keyCode == 13) {
        event.preventDefault()
        return false
    }
})