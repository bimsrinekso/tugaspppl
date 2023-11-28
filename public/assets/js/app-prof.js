formatCode = (id, value, mode) => {
    let cm = CodeMirror(document.getElementById(id), {
        value: value,
        mode: mode,
        theme: 'material',
        readOnly: true,
        lineNumbers: true,
        lineWrapping: true,
        matchBrackets: true,
        autoCloseBrackets: true,
        styleActiveLine: true,
        indentUnit: 2,
        tabSize: 4,
    });
    let editorValue = cm.getValue();

    let lines = editorValue.split('\n');

    if (lines[0].trim() === '') {
        lines.shift();
        cm.setValue(lines.join('\n'));
    }

    return cm;
}

function downloadKey (value, fileName) {
    const text = value;
    const blob = new Blob([text], { type: 'application/x-pem-file' });
    const link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = fileName;
    link.click();
    URL.revokeObjectURL(link.href);
}

function applyCodeMirror(tabId, contentId, value, mode) {
    $(`#${tabId}`).on('shown.bs.tab', function() {
        let content = $(`#${contentId}`).find(".CodeMirror");
        if(content.length == 0){
            formatCode(contentId, value, mode);
            if (contentId == 'publicKey') {
                const downloadPublicKeyBtn = document.getElementById('downloadPublicKeyBtn');
                downloadPublicKeyBtn.addEventListener('click', function() {
                    downloadKey(value, 'public_key.pem');
                });
            } else if (contentId == 'privateKey') {
                const downloadPrivateKeyBtn = document.getElementById('downloadPrivateKeyBtn');
                downloadPrivateKeyBtn.addEventListener('click', function() {
                    downloadKey(value, 'private_key.pem');
                });
            }
        }
    });
}
$(document).ready(function() {
    applyCodeMirror('v-pills-key-tab', 'publicKey', `${publicKey}`, 'shell');
    applyCodeMirror('v-pills-key-tab', 'privateKey', `${privateKey}`, 'shell');
});
