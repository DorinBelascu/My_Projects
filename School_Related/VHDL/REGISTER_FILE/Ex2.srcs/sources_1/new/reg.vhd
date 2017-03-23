----------------------------------------------------------------------------------
-- Company: 
-- Engineer: 
-- 
-- Create Date: 03/04/2017 06:00:52 PM
-- Design Name: 
-- Module Name: test_env - Behavioral
-- Project Name: 
-- Target Devices: 
-- Tool Versions: 
-- Description: 
-- 
-- Dependencies: 
-- 
-- Revision:
-- Revision 0.01 - File Created
-- Additional Comments:
-- 
----------------------------------------------------------------------------------


library IEEE;
use IEEE.STD_LOGIC_1164.ALL;
use IEEE.STD_LOGIC_UNSIGNED.ALL;
USE iEEE.NUMERIC_STD.ALL;

-- Uncomment the following library declaration if using
-- arithmetic functions with Signed or Unsigned values
--use IEEE.NUMERIC_STD.ALL;

-- Uncomment the following library declaration if instantiating
-- any Xilinx leaf cells in this code.
--library UNISIM;
--use UNISIM.VComponents.all;

entity reg is
    Port ( CLK : in STD_LOGIC;
           RA1 : in STD_LOGIC_VECTOR(3 downto 0);
           RA2 : in STD_LOGIC_VECTOR(3 downto 0);
           WA : in STD_LOGIC_VECTOR(3 downto 0);
           WD : in STD_LOGIC_VECTOR(15 downto 0);
           RD1 : out STD_LOGIC_VECTOR(15 downto 0);
           wen : in STD_LOGIC;
           RD2 : out STD_LOGIC_VECTOR(15 downto 0));
end reg;

architecture Behavioral of reg is

type reg_array is array (0 to 15) of std_logic_vector(15 downto 0);
signal reg_file : reg_array := (0 => x"0001", 1 => x"0001", 2 => x"0002", 3 => x"0003", 4 => x"0004", others => x"0000");
begin
    process(clk)
        begin
            if rising_edge(clk) then
                if wen = '1' then
                    reg_file(conv_integer(WA))(15 downto 0) <= WD(15 downto 0);
                end if;
        end if;
    end process;
    
    RD1 <= reg_file(conv_integer(RA1));
    RD2 <= reg_file(conv_integer(RA2));

end Behavioral;
