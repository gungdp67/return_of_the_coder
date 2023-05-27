# GeekSeat Saga : Return of the Coder

## The Killswitch to stop the Witch
### Development Environtment
#### PHP Version : 7.4.33
#### Framework : Laravel 8

### Flows of the code
The first time web application is hit, we will be redirected to home view that provides input to put how many people will be checked. Then generate the person form, fill the year of birth and year of death. And then submit it.
Once the form submitted the process will be redirected to CoderController at method named CounterWitch. Here the calculation of numbers happen.

There is a Traits named CoderSupport in app\Services\Traits to handle the calculations. Separated from the controller so it can be imported into test unit and test it.

The method whitin the traits are :
-Get witch kill number by year
-Get Average kill number
-Check is year valid
-Get fibonacci numbers

There are 4 tests which are :
-The controller method triggered when user submit the form is not returning any errors.
-The fibonacci numbers are correct
-The average kill number is correct
-Check if the person datas are invalid and return -1

Web application demo : http://returnofthecoder.nawacoco.com
