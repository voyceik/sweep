function mret = gettexbetween(tx0, str1, str2)
%Returns cleaned strings from tx0 between str1 and str2
pat = [str1 '.*?' str2];
lo = length(str1);
le = length(str2);
S = regexpi(tx0,pat,'match');
S2 = cellfun(@(x) x(1+lo:end-le), S, 'UniformOutput',false);
S2 = cellfun(@(x) x(x~=9 & x~=10 & x~=13), S2, 'UniformOutput',false);
S2 = cellfun(@trimall,S2, 'UniformOutput',false);
S2 = S2(~cellfun(@isempty,S2));
mret = S2;
end
