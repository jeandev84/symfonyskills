

let input = document.getElementById("input");

const WIDTH = 800; // 300;

input.addEventListener("change", (event) => {

     let image_file = event.target.files[0];

     let reader = new FileReader();
     reader.readAsDataURL(image_file);

     reader.onload = (event) => {

          let image_url = event.target.result;
          let image = document.createElement("img")
          image.src = image_url

          image.onload = (e) => {

              let canvas    = document.createElement("canvas")
              let ratio     = WIDTH / image.width
              canvas.width  = WIDTH;
              canvas.height = image.height * ratio;

              const context = canvas.getContext("2d")
              context.drawImage(image, 0, 0, canvas.width, canvas.height)

              let new_image_url = context.canvas.toDataURL("image/jpeg", 98)

               // console.log("Image URL: " + new_image_url);

               let image_file = urlToFile(new_image_url)

               uploadImage(image_file)
          }

     }


})


let urlToFile = (url) => {

    let arr  = url.split(",") // console.log(arr)
    let mime = arr[0].match(/:(.*?);/)[1]
    let data = arr[1]

    // decrypt data
    let dataStr = atob(data)
    let n = dataStr.length
    let dataArr = new Uint8Array(n)

    // convert each data to Uint16Code

    while (n--) {
        dataArr[n] = dataStr.charCodeAt(n)
    }

    // console.log(dataStr)

    return new File([dataArr], 'File.jpg', {
        type: mime
    })

    // console.log(file)
    //console.log("data:", dataStr)
    //console.log("mime:", mime)
    //console.log("data:", data)
}



let uploadImage = (file) => {

    // let url = "http://127.0.0.1:8000/api/upload"
    let url = "http://localhost:8000/"

    let payload = new FormData()
    payload.append('file', file); // name from backend $request->files->get('file')


    fetch(url, {
        method: 'POST',
        body: payload
    })
}
