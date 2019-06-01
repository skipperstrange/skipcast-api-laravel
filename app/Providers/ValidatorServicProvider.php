<?php

namespace App\Services;

/**
 * Custom validator rules.
 * Add this at app\Services
 *
 * @author Alejandro Mostajo <amostajo@gmail.com>
 */
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Validator extends \Illuminate\Validation\Validator
{
    /**
     * Validates if the value is an audio file.
     * Returns flag indicating the success of the validation rule.
     *
     * @param string $attribute Name of the attribute being validated.
     * @param mixed  $value     Value of the attribute being validated.
     * @param array  $parameter Validation parameters.
     *
     * @return bool
     */
    public function validateAudio($attribute, $value, $parameters = [])
    {
        if (!($value instanceof UploadedFile)) return false;
        return in_array(
            preg_replace(
                [
                    '/audio\/mpeg/',
                    '/audio\/x-wav/',
                    '/application\/ogg/',
                ],
                [
                    'mp3',
                    'wav',
                    'ogg',
                ],
                $value->getMimeType()
            ),
            $parameters
        );
    }
    /**
     * Replaces variables in the output message sent by the validator when the audio rule failes.
     * Returns the replaced string.
     *
     * @param string $message 	Output message.
     * @param string $attribute Name of the attribute being validated.
     * @param string $rule 			Name of the rule.
     * @param array  $parameter Validation parameters.
     *
     * @return string
     */
    protected function replaceAudio($message, $attribute, $rule, $parameters)
    {
        return str_replace(':other', implode(' or ', $parameters), $message);
    }
}
