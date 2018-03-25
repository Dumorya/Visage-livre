/* UNUSED FOR THE MOMENT */

var newComment = document.getElementsByClassName('commentPartHidden');

function displayNewComment()
{
    for(var i = 0; i < newComment.length ; i++)
    {
        newComment[i].style.display = 'block';
    }
}