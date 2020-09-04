<?php
class Validacion extends Singleton
{
    private $_rules = array();
    private $_errors = array(); // ejemplo: _errors['nombre'] = array('value' => 'Pedro','rule' => 'required')
    private $_oks = array();
    private $_errorFoto;
    private $_exists;
    private $_telfRepeat;
    public function addRules($rules)
    {
        $this->_rules = $rules;
    }

    public function run($toValidate)
    {
        foreach ($toValidate as $field => $value) {
            // si el nombre del campo no esta en $this->_rules es que no hay que validarlo
            if (!array_key_exists($field, $this->_rules)) continue;
            // creamos un array con la cadena $this->_rules[$field] usando como separador de elementos |
            $rules = explode('|', $this->_rules[$field]);
            // Si el campo es requerido en $rules hay un elemento cuyo contenido es 'required'
            if (in_array('required', $rules)) {
                // el método validate_required verifica si el campo tiene contenido, es decir, ha sido rellenado
                // si no es así, añade el campo al array _errors
                $this->_validate_required($field, $value);
                // si el campo no se ha rellenado no sigue relizando el control de entrada
                // por ello verifica que si existe un elemento con el 'rule'='required'
                // getArray() esta definida en common.php
                if (getArray($this->getErrorsByField($field), 'rule') == 'required')
                    continue;
            }
            foreach ($rules as $rule) {
                if ($rule == 'required') continue;
                $method = '_validate_' . $rule;
                // verifica si el método de validación existe en esta clase (constante __CLASS__)
                if (!method_exists(__CLASS__, $method)) continue;
                // ejecuta el método de validación (por ejemplo, validate_alpha_space)
                $this->$method($field, $value);
            }
            // puede que en los formularios haya algún campo que no queramos validar,
            // pero hay que registrarle en _errors para que el método mdlPaso1() recupere su valor
            if (empty($this->getErrorsByField($field)))
                $this->_setError($field, $value, 'ok');
        }
    }

    public function isValid()
    {
        if (count($this->_oks) == count($this->_errors))
            return true;
        return false;
    }

    public function getStrRule($rule)
    {
        switch ($rule) {
                // solo hay una posible coincidencia, pero ya añadiremeos más
            case 'alpha_space':
                return 'El texto no puede contener caracteres especiales.';
        }
        return '';
    }

    public function restoreValue($name)
    {
        if (array_key_exists($name, $this->_errors)) {
            $value = $this->_errors[$name]['value'];
            return "$value";
        }
        return "";
    }

    public function restoreSelects($name, $value, $default = false)
    {
        //si _errors está vacío, es la primera vez que se visualiza el formulario
        if ($this->_errors) {
            if (array_key_exists($name, $this->_errors)) {
                // _errors[$name]['value'] es un array (Bicicleta, Tren etc.)
                foreach ($this->_errors[$name]['value'] as $valor) {
                    if ($valor == $value)
                        return 'selected';
                }
            }
            // es la primera vez que se visualiza el formulario y podemos poner valores por defecto.
        } elseif ($default)
            return 'selected';
    }

    public function getOks()
    {
        return $this->_oks;
    }


    // método que devuelve el elemento del array _errors de un campo (si existe)

    public function getErrorsByField($field)
    {
        return getArray($this->_errors, $field, array());
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    private function _setError($field, $value, $rule)
    {
        $this->_errors[$field] = array(
            'value' => $value,
            'rule' => $rule
        );
        if ($rule == 'ok') {
            $this->_oks[$field] = $value;
        }
    }
    // Método que valida que el dato introducido en el campo es correcto
    // Observa que la 2ª parte del nombre del método (alpha_space) coincide con el tipo de dato
    // que se utiliza en el array $_rules de la clase mdlPaso1
    private function _validate_alpha_space($field, $value)
    {
        if (!preg_match('/^([a-zÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ.\s]{1,300})+$/i', $value))
            $this->_setError($field, $value, 'alpha_space');
        else
            $this->_setError($field, $value, 'ok');
    }

    // método que añade una elemento al array _errors cuando un campo obligatorio no se ha completado
    private function _validate_required($field, $value)
    {
        if (strlen($value) == 0)
            $this->_setError($field, $value, 'required');
    }
}
