console.log('coucou')
let buttons = document.querySelectorAll('button');
let comment_id = 0
console.log(buttons);
buttons.forEach(btn => {
    btn.addEventListener("click",function(){
        if (this.classList.contains('delete')) {
            comment_id = this.dataset.comment_id 
            console.log(comment_id);
        }
        else if (this.classList.contains('delete-confirm')){
            console.log(comment_id,document.getElementById(`form_id_${comment_id}`));
            document.getElementById(`form_id_${comment_id}`).submit();
        }
    })
});