function successAlerts(title, message, iconType) 
{
    return Swal.fire(title,message,iconType)          // iconType = info,warning,success,error,question
        // Swal.fire({
        //     icon: iconType,
        //     title: title,
        //     text: message,
        //   });
}
function workSavedSatus(messages,iconType)
{
    Swal.fire({
        // position: 'center',
        icon: iconType,
        title: messages,
        showConfirmButton: false,
        timer: 4000
    })
}

  