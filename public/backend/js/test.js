let input = document.querySelector('.single')
let previewImage = document.querySelector('#singleImage')

input.addEventListener('change', function (e) {
    previewImage.src = ''
    let reader = new FileReader();
    reader.onload = () => {
        previewImage.src = reader.result
        previewImage.style.width = '100px'
        previewImage.style.height = '90px'
    }
    reader.readAsDataURL(input.files[0])
})