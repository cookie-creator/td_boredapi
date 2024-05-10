## Readme

Developed WebAPI as script what worked with remote Bored API

Implemented WebAPI to send requests to remote api, made validation of arguments which can be past into script 

To get recommendation about Rest you can run boredapi.php from console with params
- Number of `participants` in range 0-8 
- Parameter `type` of the activity`["education", "recreational", "social", "diy", "charity", "cooking", "relaxation", "music", "busywork"]` 
- Parameter for output data `sender` can be `["console", "file"]` - this parameter is strictly required   

Here it is examples how to run script
```
php ./script/boredapi.php participants=3 type=social sender=console
```
```
php ./script/boredapi.php participants=3 sender=console
```
```
php ./script/boredapi.php participants=3 sender=console
```
