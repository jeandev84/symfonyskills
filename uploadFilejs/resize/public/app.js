let input = document.getElementById("input");

const WIDTH = 800; // 300

input.addEventListener("change", (event) => {

     let image_file = event.target.files[0];

     console.log("Original File", image_file);

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

              let new_image = document.createElement("img")
              new_image.src = new_image_url

              // RESIZED IMAGE (THUMB
              document.getElementById("wrapper").appendChild(new_image)
          }

          // BIG IMAGE
          // document.getElementById("wrapper").appendChild(image)


     }


})

