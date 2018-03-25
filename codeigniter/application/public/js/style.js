/* UNUSED FOR THE MOMENT */

var newComment = document.getElementsByClassName('commentPartHidden');

function displayNewComment()
{
    for(var i = 0; i < newComment.length ; i++)
    {
        newComment[i].style.display = 'block';
    }
}

var changeIconFriend = document.getElementsByClassName('fa-user-plus');

function displayNewIcon()
{
    for(var i = 0; i < changeIconFriend.length ; i++)
    {
        changeIconFriend[i].add('fa-clock');
        changeIconFriend[i].remove('fa-user-plus');
    }
}