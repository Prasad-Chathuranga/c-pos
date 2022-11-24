

function loadAvailableSubjects($data){

    let url = window.urlBag.subjects + $data.data.exam_id;

    $data.loading = true;

    let selSubs = [];
    let subMedium = {};

    $data.selectedSubjects.forEach((val, key) => { selSubs.push(key); subMedium[key] = val.medium; });
    $data.selectedSubjects.clear();
    $data.subjectList = [];

    axios.get(url, {'params' : { 'with-edit' : true, 'enrollment_id' : $data.data.id , 'subjects' : selSubs , mediums : subMedium}}).then((response) => {
        $data.subjectList = response.data.data;
        $data.USDRate = response.data.USDRate;
        setupSubjectSelection($data);
        $data.loading = false;
     })
    .catch(err => { $data.loading = false;
                    pnotify('Error', $data.validator.formatServerMessage(err.response)  , 'error');
        });


}

function save($data){

    let url = window.urlBag.save ;

    let selSubs = [];
    let selection = [];

    if($data.selectedSubjects.size == 0 || !$data.validator.validate())
        return pnotify('Error' , 'Required information is missing in the form.','error');

    $data.selectedSubjects.forEach((val, key) => { selSubs.push(key); selection.push({ id: val.id, medium : val.medium});  });

    $data.loading = true;
    axios.post(url , { ...$data.data , subjects:selSubs , selection})
    .then((response) => {

                pnotify('Success', response.data.message  , 'success');
                $data.loading = false;

                setTimeout(() => {
                    window.location = response.data.url;
                }, 2000);

                }).catch(err => {
                $data.loading = false;
                pnotify('Error', $data.validator.formatServerMessage(err.response)  , 'error');
                })

                ;


}

function selectionChanged($data , $el , sub_id , sub){

   if($el.checked)
        pushToSelection($data , sub_id , sub);
    else
        removeFromSelection($data,sub_id);

    loadAvailableSubjects($data);

}

function pushToSelection($data , sub_id, sub){
    $data.selectedSubjects.set(sub_id,sub);
}

function removeFromSelection($data , sub_id){
    $data.selectedSubjects.delete(sub_id);
}


function setupSubjectSelection($data){

    $data.subjectList.forEach( i => {

        if(i.locked || i.selected) {
            pushToSelection($data , i.id ,i)
        }

    });

    calculateTotal($data)

}

function calculateTotal($data){

    $data.totalPrice = 0;
    let isLocal = $data.data.isLocal;
    let country = $data.data.countryResiding;

    if(isLocal == undefined || country == undefined) return;




    $data.selectedSubjects.forEach ((sub) => {

        if(country == 1)
            $data.totalPrice += sub.priceLocal ? sub.priceLocal : 0;
        else
            $data.totalPrice += sub.priceINTL ? (sub.priceINTL * $data.USDRate) : 0;

    });

}

function init(){


    return {

        loading: false ,
        validator : null,
        totalPrice : 0,
        subjectList : [] ,
        selectedSubjects : new Map(),
        data : { exam_id : null }

    };
}


function fixSetup($data){

    $data.data.selSubs.forEach((i) => { pushToSelection($data, i.id , i) });

}
