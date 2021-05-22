<!-- Validation Message -->
@if($errors->any())
<?php $validation = ""; ?>
@foreach($errors->all() as $er)
<?php $validation .= $er . '\n'; ?>
@endforeach
<script type="text/javascript">
    PNotify.notice({
        title: 'Notice!!',
        text: '<?= $validation ?>',
        hide: false,
        modules: {
            Confirm: {
                confirm: true,
                buttons: [{
                    text: 'Ok',
                    primary: true,
                    click: function(notice) {
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
</script>
@endif

<!-- Success Message -->
@if(Session::has('success'))
<script type="text/javascript">
    PNotify.success({
        title: 'Success!!',
        text: '<?= Session::get('success') ?>',
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
</script>
@endif

<!-- Success Message -->
@if(Session::has('error'))
<script type="text/javascript">
    PNotify.error({
        title: 'Error!!',
        text: '<?= Session::get('error') ?>',
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
</script>
@endif