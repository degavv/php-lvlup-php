<?php

namespace app\validators;
/**
 * Validates something 
 */
class Validator
{
    /**
     * Validates the photo according to the specified criteria
     * @param mixed $uploadedFile
     * @return array
     */
    public static function validate($uploadedFile): array
    {
        $errors = [];

        if (!isset($uploadedFile) || $uploadedFile['error'] !== UPLOAD_ERR_OK) {
            $errors[] = FILE_UPLOAD_ERRORS[$uploadedFile['error']] ?? 'Невідома помилка завантаження.';
            return $errors;
        }

        // MIME-тип
        if (!in_array($uploadedFile['type'], PHOTO_AVAILABLE_TYPES, true)) {
            $errors[] = FILE_UPLOAD_ERRORS[5]; // Недопустимий тип файла
        }

        // Розмір
        if ($uploadedFile['size'] > PHOTO_MAX_FILE_SIZE) {
            $errors[] = FILE_UPLOAD_ERRORS[2]; // Завеликий файл
        }

        return $errors;
    }
}