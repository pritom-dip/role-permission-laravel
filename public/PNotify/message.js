// notice=============
function noticePN(msg) {
    PNotify.notice({
        title: 'Notice!!',
        text: msg,
        hide: false,
        modules: {
            Confirm: {
                confirm: true,
                buttons: [{
                    text: 'Ok',
                    primary: true,
                    click: function (notice) {
                        notice.close();
                    }
                }]
            },
            Buttons: {
                closer: false,
                sticker: false
            },
            History: {
                history: false
            },
            Animate: {
                animate: true,
                inClass: 'slideInUp',
                outClass: 'rotateOutUpRight'
            }
        },
        stack: PNotify.defaultStack
    });
}


// success==============
function successPN(msg) {
    PNotify.success({
        title: 'Success!!',
        text: msg,
        delay: 2000,
        modules: {
            Animate: {
                animate: true,
                inClass: 'slideInUp',
                outClass: 'rotateOutUpRight'
            }
        },
        stack: PNotify.defaultStack
    });
}


// error=============
function errorPN(msg) {
    PNotify.error({
        title: 'Error!!',
        text: msg,
        delay: 3000,
        modules: {
            Animate: {
                animate: true,
                inClass: 'slideInUp',
                outClass: 'rotateOutUpRight'
            }
        },
        stack: PNotify.defaultStack
    });
}

// Default Setting Pnotify================
PNotify.defaultStack = {
    dir1: 'up',
    dir2: 'left',
    firstpos1: 10,
    firstpos2: 10,
    spacing1: 10,
    spacing2: 10,
    push: 'bottom',
    context: document.body
}
