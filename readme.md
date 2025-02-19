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
### RandSequence
Represents a random sequence generator that implements the Iterator interface.
```php
$sequence = new \DiePHP\Sequences\RandSequence(50, 60);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(55)
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

### LinearSequence
Represents a linear sequence that implements the Iterator interface.
```php
$sequence = new \DiePHP\Sequences\LinearSequence(1, 10);
foreach ($sequence AS $value) {
    var_dump($value);
}
/**
 *  int(1)
 *  int(11)
 *  int(21)
 *  int(31)
 *  int(41)
 *  int(41)
 *  int(51)
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
