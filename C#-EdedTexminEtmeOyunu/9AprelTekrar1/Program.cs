using System;

namespace _9AprelTekrar1
{
    internal class Program
    {
        static void Main(string[] args)
        {
            Random randomEded = new Random();
            
            bool menu = true;
            while (menu)
            {
                Menu();
                string command = Console.ReadLine();
                switch (command)
                {
                    case "1":
                        int puan = 100;
                        int count = 0;
                        int sans = 2;
                        int min = 1;
                        int max = 10;
                        int num = randomEded.Next(min,max);
                        bool start = true;
                        Console.WriteLine("Oyundan cixmaq ucun stop yazin enteri vurun!");
                        while (start)
                        {
                            
                            
                            if (sans == 0)
                            {
                                Console.WriteLine($"Sansiniz bitdi. Puaniniz : {puan - (count * 50)}. Eded :{num}");
                                start = false;
                                break;
                            }
                            Console.WriteLine($"Ededi texmin edin ({min} - {max}) :");
                            string inputNumStr = Console.ReadLine();
                            if(inputNumStr == "stop")
                            {
                                Console.WriteLine("Oyun dayandirildi !");
                                start = false;
                                break;
                            }
                            int inputNumInt = int.Parse(inputNumStr);
                            if (inputNumInt == num)
                            {
                                Console.WriteLine("Tebrikler ededi tapdiniz");
                                Console.WriteLine($"Puaniniz : {puan - (count*50)}");
                                Console.WriteLine($"Qalan caniniz : {sans}");
                                start = false;
                            }                                
                            else if (inputNumInt > num)
                            {
                                count++;
                                Console.WriteLine("Daxil etdiyiniz eded boyukdur");
                            }                                
                            else if (inputNumInt < num)
                            {
                                count++;
                                Console.WriteLine("Daxil etdiyiniz eded kicikdir");
                            }
                            sans--;
                            
                            
                        }                        
                        break;
                    case "2":
                        Console.WriteLine("Program dayandirildi !");
                        menu = false;
                        break;
                    default:
                        Console.WriteLine("Yanlish Secim!");
                        break;
                }
            }

        }
        static void Menu()
        {
            Console.WriteLine("------Menu------");
            Console.WriteLine("1 - Oyuna Basla");
            Console.WriteLine("2 - Programi Dayandir");
        }
    }
}
