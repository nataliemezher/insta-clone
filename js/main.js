document.addEventListener("click", function (e) {
    if (e.target.classList.contains("img-gallery")) {
      const src = e.target.getAttribute("src");
      let popUp = document.getElementById("popUp");
      popUp.style.display = "block";
      document.querySelector("#popUpImage").src = src;

      let popUpTitle = e.target.dataset.title;
      document.querySelector("#popUpTitle").innerHTML = popUpTitle;

      let popUpContent = e.target.dataset.content;
      document.querySelector("#popUpContent").innerHTML = popUpContent;

      let popUpPostid = e.target.dataset.postid;
      document.querySelector("#popUpImage").dataset.postid = popUpPostid;
        document.querySelector("#getpostid").value = popUpPostid;


          let params = new URLSearchParams(document.location.search);
        let getUserid = params.get("user_id");


        let testAjax = new XMLHttpRequest();
        testAjax.open("GET", `includes/showcomments-inc.php/?post_id=${popUpPostid}`);

        testAjax.send();

        testAjax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let data = JSON.parse(this.responseText);
                let comments = data.comments;
                let userid = data.userid;


                for(let i = 0; i < comments.length; i++) {

                    let content = comments[i].content;
                    let username = comments[i].username;
                    let timestamp = comments[i].createdAt;
                    let commentid = comments[i].comment_id;


                    let testingContent = `

                    <div class="comment-item">
                    <div class="comment-header"><h2>${username}</h2><p id="comment-timestamp">${timestamp}</p></div>
                    <div class="comment-content"><div><p>${content}</p></div>


                    ${userid == comments[i].user_id || userid == getUserid ?

                    `<form action="#" method="post"><div id="delete-button-box"><input type="hidden" value ="${comments[i].user_id}" name="commenter">
                    <button value ="${commentid}" placeholder="Ta bort" name="delete" type="submit" id="delete-comment">X</button></div></div>
                    </form>` : ''

                }

                `;

                    document.getElementById("showComments").innerHTML += testingContent;

                }

            }
        };

      //window.location.href = window.location.href+'?postid='+ popUpPostid;
    }
  });



document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    popUp.style.display = "none";
    document.getElementById("showComments").innerHTML = "";
  }
});

document.getElementById('closeMe').addEventListener("click",function(e){
  popUp.style.display = "none";
  document.getElementById("showComments").innerHTML = "";
});
