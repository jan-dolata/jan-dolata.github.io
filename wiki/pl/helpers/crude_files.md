Files
===

Klasa `CrudeFiles`

Klasa pozwala na zapisywanie i usuwanie plików, dokładnie tak jak robi to api.

Metody:

- `public function upload($model, $folderName, $files)`
- `public function delete($model, FileLog $log)`

Przykład:
```php
    public function uploadFile(Request $request)
    {
        $files = $request->file()['file'];

        $model = new ModelWithFiles();
        $model = (new CrudeFiles)->upload($model, 'CrudeClassName', $files);
    }

    public function deleteFile(Request $request, $modelId)
    {
        $logId = $request->input('file_log_id');
        $model = (new ModelWithFiles())->find($modelId);

        $log = (new CrudeFileLog)->find($logId);
        if (! empty($log)) {
            (new CrudeFiles)->delete($model, $log);
        }

        $model->files = array_filter($model->files, function ($file) use ($logId) {
            return $file['file_log_id'] != $logId;
        });
    }
```
