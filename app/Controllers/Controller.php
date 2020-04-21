<?php
namespace App\Controllers;
use App\Exception\ValidationException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Valitron\Validator;

class Controller
{

    public function validate(Request $request, array $rules = [])
    {

        $validator = new Validator(
            $parameter = $request->getParsedBody()
        );

        $validator->mapFieldsRules($rules);
        if(!$validator->validate()){
            throw new ValidationException(
                $validator->errors(),
                $request->getUri()->getPath()
            );
        }

        return $parameter;

    }
}
