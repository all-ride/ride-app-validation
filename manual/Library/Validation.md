## Filters

### trim

Trims the provided value from spaces.

Options:

* __trim.lines__: trim all lines, or values if the provided value is an array (boolean|optional)
* __trim.empty__: remove empty lines or values, only when _trim.lines_ is enabled (boolean|optional)

### lower

Lowercases the provided string value, or all values in the array if an array is provided

Options:

* __mode__: Mode of the uppercase (normal, first or word)

### upper

Uppercases the provided string value, or all values in the array if an array is provided

Options:

* __mode__: Mode of the uppercase (normal, first or word)

### replace

Replaces a value with another value

Options:

* __search__: Value to look for
* __replace__: Value to replace with

### characters

Filters all non-allowed characters from a string.

Options:

- __characters__: all allowed characters, characters not found in this string, will be trimmed out (string)

### safeString

Transforms a string to a safe string for URL's or file names.

Options: 

- __replacement__: replacement for special characters, defaults to - (string|optional)
- __lower__: transform to lower case, defaults to true (boolean|optional)

## Validators

### class

Checks if the provided string is a valid class name.

Options:

* __class__: class which the provided class should implement or extend (string|optional)
* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.class__
* __error.validation.class.extends__
* __error.validation.class.implements__

### dsn

Checks if the provided string is a valid DSN.

Options:

* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.dsn__
* __error.validation.required__

### email

Checks if the provided value is a valid email address.

Options:

* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.email__
* __error.validation.required__

### extension

Checks if the provided path string has a allowed extension.

Options:

* __extensions__: allowed extensions (array)
* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.file.extension__
* __error.validation.required__

### minmax

Checks if the provided numeric value is in the provided range.

Options:

* __error.minimum__: error code when the value is less then minimum (string|optional)
* __error.maximum__: error code when the value is more then maximum (string|optional)
* __error.minimum.maximum__: error code when the value is not between minimum and maximum (string|optional)
* __error.numeric__: error code when the value is not numeric (string|optional)
* __minimum__: minimum value (numeric|optional)
* __maximum__: maximum value (numeric|optional)
* __required__: flag to see if a value is required (boolean|optional)

_Note: Minimum and maximum are both optional both at least one of them is required.
The values for minimum and maximum are included in the range._

Errors:

* __error.validation.minimum__
* __error.validation.maximum__
* __error.validation.minmax__

### numeric

Checks if the provided value is a numeric value.

Options:

* __error.numeric__: error code when the value is not numeric (string|optional)
* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.numeric__

### regex

Checks if the provided string matches a regular expression.

Options:

* __error.regex__: error code when the value did not match the regular expression (string|optional)
* __error.required__: error code when the required value was empty (string|optional)
* __regex__: regular expression to match (string)
* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.regex__
* __error.validation.required__

### required

Checks if a value is provided

Options:

* __error.required__: error code when no value is provided (string|optional)

Errors:

* __error.validation.required__

### size

Checks if the length of the provided string or the size of the provided array.

Options:

* __minimum__: minimum value (numeric|optional)
* __maximum__: maximum value (numeric|optional)

_Note: Minimum and maximum are both optional both at least one of them is required.
The values for minimum and maximum are included in the range._

Errors:

* __error.validation.maximum.array__
* __error.validation.maximum.string__
* __error.validation.minimum.array__
* __error.validation.minimum.string__
* __error.validation.minmax.array__
* __error.validation.minmax.string__
* __error.validation.object__

### url

Checks if the provided string is a valid URL.

Options:

* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.required__
* __error.validation.url__

### website

Checks if the provided string is a valid website.
This is the same as the URL validator but limited to http(s)://.

Options:

* __required__: flag to see if a value is required (boolean|optional)

Errors:

* __error.validation.required__
* __error.validation.website__

## Constraints

The _Constraint_ interface is used to validate a data container.
A data container can be an array or an object.

### generic

The _GenericConstraint_ is a combination of filters and validators which can be applied on specific properties of the data container.

### or

The _OrConstraint_ defines a set of properties for which at least one has to be provided.
When constraining, it will add a validation error to all properties when none of them is provided.

### equals

The _EqualsConstraint_ defines a set of properties which have to have the same value.
Usefull when asking to repeat a new password.

### conditional

The _ConditionalConstraint_ is a generic constraint which only validates when defined properties contain a specific value.
Usefull for properties which are dependant on a type or status.

### chain

The _ChainConstraint_ is used to combine different constraints together into one.
Usefull to build a full validation for a complex data type.
