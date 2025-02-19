## Sequences 
#### Infinity Iterators of sequences
Infinity Iterators are a powerful tool for handling endless or large sequences of data. Designed for efficiency and flexibility, these iterators allow seamless traversal and manipulation of sequences without requiring the entire sequence to be loaded into memory.


## Installation

Install the package via Composer:

```bash
composer require diephp/sequences
```

Or manually add it to your `composer.json`:

```json
"require": {
    "diephp/sequences": "^1.1.0"
}
```

### Key Features
Endless Sequences: Handle infinite sequences gracefully, making them suitable for scenarios where data is continuously generated or streamed.
Lazy Evaluation: Elements are generated on-the-fly, ensuring minimal memory usage and optimized performance.
Customizable: Easily define custom sequences and behaviors to fit specific needs.
Composable: Combine multiple iterators to create complex data flows and transformations.


## Use Cases
Data Streaming: Ideal for applications that process continuous data streams, such as live feeds or real-time analytics.
Large Dataset Processing: Efficiently work with large datasets that cannot be loaded entirely into memory.
Algorithm Implementation: Perfect for implementing algorithms that require infinite sequences, such as the Fibonacci sequence or prime numbers.

## Example

### ExponentialSequence
Represents an exponential sequence that implements the Iterator interface.
```php
$sequence = new \DiePHP\Sequences\ExponentialSequence(1, 100);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(1)
 *  int(2)
 *  int(4)
 *  int(8)
 *  int(16)
 *  int(32)
 *  int(64)
......
 */
```

### ProgressiveSequence
Represents a progressive sequence that can be iterated over.
```php
$sequence = new \DiePHP\Sequences\ProgressiveSequence(100, 50);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(100)
 *  int(150)
 *  int(250)
 *  int(400)
 *  int(600)
 *  int(850)
 *  int(1150)
......
 */
```

### LinearSequence
Represents a linear sequence that implements the Iterator interface.
```php
$sequence = new \DiePHP\Sequences\LinearSequence(100, 50);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(100)
 *  int(150)
 *  int(200)
 *  int(250)
 *  int(300)
 *  int(350)
 *  int(400)
......
 */
```


```php
$sequence = new \DiePHP\Sequences\LinearSequence(0, 10);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(0)
 *  int(10)
 *  int(20)
 *  int(30)
 *  int(40)
......
 */
```

### FibonacciSequence
This class generates a Fibonacci sequence, implementing the Iterator interface.
```php
$sequence = new \DiePHP\Sequences\FibonacciSequence(2);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(2)
 *  int(2)
 *  int(4)
 *  int(6)
 *  int(10)
 *  int(16)
 *  int(26)
......
 */
```

### InfiniteSequence
InfiniteSequence is an implementation of the Iterator interface, representing an infinite sequence of integers.
```php
$sequence = new \DiePHP\Sequences\InfiniteSequence(2);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(2)
 *  int(3)
 *  int(4)
 *  int(5)
 *  int(6)
 *  int(7)
 *  int(8)
......
 */
```

### UniqSequence
Represents a random sequence generator that implements the Iterator interface.

*** Guarantees uniqueness but may consume a lot of memory for large values.
```php
$sequence = new \DiePHP\Sequences\UniqRandSequence(1, 100);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(34)
 *  int(20)
 *  int(75)
 *  int(88)
 *  int(4)
 *  int(72)
 *  int(98)
 *  int(21)
 *  int(9)
......
 */
```
### RandSequence
Represents a random sequence generator that implements the Iterator interface.

*** Does not guarantee unique values.
```php
$sequence = new \DiePHP\Sequences\RandSequence(1, 100);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(2)
 *  int(58)
 *  int(51)
 *  int(55)
 *  int(60)
 *  int(54)
 *  int(51)
 *  int(50)
 *  int(55)
......
 */
```


## Tests
```bash
composer test
```

## Conclusion
Infinity Iterators of sequences provide a robust solution for managing and iterating over endless or large sequences of data. Their lazy evaluation and customization capabilities make them versatile for various applications, ensuring efficient and effective data handling.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
