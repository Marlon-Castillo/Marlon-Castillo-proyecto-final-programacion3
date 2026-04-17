using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;
using System;
using System.Threading;

namespace PruebasLibreria
{
    public class Pruebas
    {
        public static void Ejecutar()
        {
            IWebDriver driver = new ChromeDriver();

            try
            {
                LoginCorrecto(driver);
                LoginIncorrecto(driver);
                BuscarLibro(driver);
                VerAutores(driver);
                FormularioContacto(driver);
            }
            catch (Exception ex)
            {
                Console.WriteLine("Error general: " + ex.Message);
            }

            driver.Quit();
        }


        static void LoginCorrecto(IWebDriver driver)
        {
            driver.Navigate().GoToUrl("https://libreria-final-marlon.infinityfreeapp.com/login.php");

            driver.FindElement(By.Name("usuario")).SendKeys("admin");
            driver.FindElement(By.Name("clave")).SendKeys("1234");
            driver.FindElement(By.TagName("button")).Click();

            Thread.Sleep(2000);

            if (driver.Url.Contains("index"))
                Console.WriteLine("Login correcto OK");
            else
                Console.WriteLine("Login correcto FALLÓ");

            Screenshot(driver, "login_correcto.png");
        }


        static void LoginIncorrecto(IWebDriver driver)
        {
            driver.Navigate().GoToUrl("https://libreria-final-marlon.infinityfreeapp.com/login.php");

            driver.FindElement(By.Name("usuario")).SendKeys("admin");
            driver.FindElement(By.Name("clave")).SendKeys("wrong");
            driver.FindElement(By.TagName("button")).Click();

            Thread.Sleep(2000);

            if (driver.PageSource.Contains("incorrectos"))
                Console.WriteLine("Login incorrecto OK");
            else
                Console.WriteLine("Login incorrecto FALLÓ");

            Screenshot(driver, "login_incorrecto.png");
        }


        static void BuscarLibro(IWebDriver driver)
        {
            driver.Navigate().GoToUrl("https://libreria-final-marlon.infinityfreeapp.com/libros.php");

            driver.FindElement(By.Name("buscar")).SendKeys("business");
            driver.FindElement(By.TagName("button")).Click();

            Thread.Sleep(2000);

            Console.WriteLine("Búsqueda ejecutada");

            Screenshot(driver, "buscar_libro.png");
        }


        static void VerAutores(IWebDriver driver)
        {
            driver.Navigate().GoToUrl("https://libreria-final-marlon.infinityfreeapp.com/autores.php");

            Thread.Sleep(2000);

            Console.WriteLine("Página autores cargada");

            Screenshot(driver, "autores.png");
        }


        static void FormularioContacto(IWebDriver driver)
        {
            driver.Navigate().GoToUrl("https://libreria-final-marlon.infinityfreeapp.com/contacto.php");

            driver.FindElement(By.Name("nombre")).SendKeys("Test Selenium");
            driver.FindElement(By.Name("correo")).SendKeys("test@test.com");
            driver.FindElement(By.Name("asunto")).SendKeys("Prueba");
            driver.FindElement(By.Name("comentario")).SendKeys("Comentario automático");

            driver.FindElement(By.TagName("button")).Click();

            Thread.Sleep(2000);

            Console.WriteLine("Formulario enviado");

            Screenshot(driver, "contacto.png");
        }


        static void Screenshot(IWebDriver driver, string nombre)
        {
            Screenshot ss = ((ITakesScreenshot)driver).GetScreenshot();
            ss.SaveAsFile(nombre);
        }
    }
}